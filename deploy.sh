#!/usr/bin/env bash

# HOW TO USE THIS.
# Example:
#
# To deploy tag on stage.
#   ./deploy.sh -c v1.0.16 -m "Fix the issue on syncing." -t "2016-12-12T01:00"

DIR=/var/www/html/bullseye/
DRUSH_ENV="@be.stage"
EXECUTOR="Bulls Eye Server"
SENDER="no-reply@archerjordan.com"
RECIPIENT="gvillorente@archerjordan.com rumandal@archerjordan.com mlepana@archerjordan.com rtandang@archerjordan.com rhallarcis@archerjordan.com mcruz@archerjordan.com"
SUBJECT="BullsEye Deployment Notification"
HEADER="From: $EXECUTOR <$SENDER>"

cd $DIR

# Set the flags.
code_flag=0
message_flag=0
time_flag=0

while getopts ":c:m:t:" opt; do
  case $opt in
    c)
      code_flag=1
      CODE="$OPTARG"
      ;;
    m)
      message_flag=1
      MESSAGE="$OPTARG"
      ;;
    t)
      time_flag=1
      DATE="$OPTARG"
      ;;
    \?)
      echo "Invalid option: -$OPTARG" >&2
      exit 1
      ;;
    :)
      echo "Option -$OPTARG requires an argument." >&2
      exit 1
      ;;
  esac
done

# Check the required parameters.
if [ $code_flag -eq 0 ] || [ $message_flag -eq 0 ] || [ $time_flag -eq 0 ]; then
  printf "Missing required parameters.\n"
  exit 1
fi

# Verify if you really wanted to deploy.
printf "NOTE: You are about to deploy on staging server.\n"
read -p "Are you sure? [Y/n] " -n 1 -r
echo    # (optional) move to a new line
if [[ $REPLY =~ ^[Yy]$ ]]; then
  # Check the CODE parameter.
  if [[ $CODE == v* ]]; then
    echo "Updating the codebase..."

    git fetch --tags
    git checkout tags/$CODE

    # Run Drush commands
    drush $DRUSH_ENV cc all
    drush $DRUSH_ENV updb -y
    drush $DRUSH_ENV fra -y --force
    drush $DRUSH_ENV cc all

    # Gather the logs.
    LOGS=$(git log --no-merges --pretty=format:"%h - %an, %ar : %s" --since="$DATE")

    # Get the version.
    VERSION=$(cat version.txt)

    # Build the message.
    INFO="NOTE: This is an automated message. \n\nWe just deployed $VERSION on staging server \n\n$MESSAGE \n\nHere are the changes: \n\n$LOGS \n\nFrom: $EXECUTOR"

    printf "$INFO" | mail -a "$HEADER" -r "$SENDER" -s "$SUBJECT" $RECIPIENT

    # Deliver the notification on Slack channel
    printf "$INFO" | slacktee.sh  > /dev/null 2>&1
  else
    BRANCH=$CODE
    git checkout $BRANCH
    git pull origin $BRANCH
    echo "You have just deployed branch $BRANCH"
  fi
else
  echo "I terminate the deployment since you are not sure about it. Feel free to command me anytime. Bye Boss!"
  exit 1
fi

