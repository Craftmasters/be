#!/usr/bin/env bash
# Created by VielSoft Ltd Co. @ 2016
cd "$(dirname "$0")"
set -e

usage () {
  echo "Parameters missing."
  echo "Usage: tag.sh <git_tag>"
  exit 1;
}

if [ -z $1 ]; then
  usage
fi

if [ ! -f version.txt ]; then
  echo "Please run tag.sh from within it's own folder."
fi

TAG=$1
FILE=version.txt

echo $TAG > $FILE
git commit $FILE -m "Tag for $TAG" --no-verify
git tag $TAG

echo "Git tag and version $TAG created."

echo "Pushing the changes to origin master..."
git push origin master
echo "Pushing the $TAG to remote origin..."
git push origin $TAG
