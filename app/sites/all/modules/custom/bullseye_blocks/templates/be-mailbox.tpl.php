<div class="be-regular-block">
  <h2 class="be-regular-h2"><?php print t('Mailbox'); ?><span class="mail-unread-count">2</span></h2>
  <div class="be-block-main">

    <div class="tabbed-block">
      <div class="tab-navigations">
        <ul class="tabs-menu">
          <li class="current"><a href="#tab-0"><?php print t('Inbox'); ?></a></li>
          <li><a href="#tab-1"><?php print t('Sent'); ?></a></li>
        </ul>
      </div>
      <div class="body-tabs">
        <div id="tab-0" class="tab-content">
          <div class="dashboard-table-wrapper">
            <table class="dashboard-tables" id="gmail-inbox">
              <tbody>
                <tr class="mailbox-unread">
                  <td class="td-50px padding-left-25">
                    <input type="checkbox">
                  </td>
                  <td class="td-18px"><span class="mailbox-dot"></span></td>
                  <td class="">
                    <a href="#">
                      <div class="mail-details">
                        <span class="mail-subject">Gekko & Co. - RFP for Telemedicine</span>
                        <span class="mail-trimmed-body">Hello James, We would like to request a ..</span>
                      </div>
                    </a>
                  </td>
                  <td class="td-85px padding-right-25">
                    <span class="light-gray-font">Jun 20</span>
                  </td>
                </tr>
                <tr>
                  <td class="td-50px padding-left-25">
                    <input type="checkbox">
                  </td>
                  <td class="td-18px"><span class="mailbox-dot"></span></td>
                  <td class="">
                    <a href="#">
                      <div class="mail-details">
                        <span class="mail-subject">Umbrella Corporation - Prevailing Wage Rates</span>
                        <span class="mail-trimmed-body">Lorem ipsium dolor sit amet, consectetur adipiscing ..</span>
                      </div>
                    </a>
                  </td>
                  <td class="td-85px padding-right-25">
                    <span class="light-gray-font">Jun 20</span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div id="tab-1" class="tab-content">
          <div class="dashboard-table-wrapper">
            <table class="dashboard-tables" id="gmail-sent-items">
              <tbody>
                <tr>
                  <td class="td-50px padding-left-25">
                    <input type="checkbox">
                  </td>
                  <td class="td-18px"><span class="mailbox-dot"></span></td>
                  <td class="">
                    <a href="#">
                      <div class="mail-details">
                        <span class="mail-subject">Gekko & Co. - RFP for Telemedicine</span>
                        <span class="mail-trimmed-body">Hello James, We would like to request a ..</span>
                      </div>
                    </a>
                  </td>
                  <td class="td-85px padding-right-25">
                    <span class="light-gray-font">Jun 20</span>
                  </td>
                </tr>
                <tr>
                  <td class="td-50px padding-left-25">
                    <input type="checkbox">
                  </td>
                  <td class="td-18px"><span class="mailbox-dot"></span></td>
                  <td class="">
                    <a href="#">
                      <div class="mail-details">
                        <span class="mail-subject">Massive Dynamic - Arrow Demo on Thursday</span>
                        <span class="mail-trimmed-body">Lorem ipsium dolor sit amet, consectetur adipiscing ..</span>
                      </div>
                    </a>
                  </td>
                  <td class="td-85px padding-right-25">
                    <span class="light-gray-font">Jun 20</span>
                  </td>
                </tr>
                <tr>
                  <td class="td-50px padding-left-25">
                    <input type="checkbox">
                  </td>
                  <td class="td-18px"><span class="mailbox-dot"></span></td>
                  <td class="">
                    <a href="#">
                      <div class="mail-details">
                        <span class="mail-subject">Umbrella Corporation - Prevailing Wage Rates</span>
                        <span class="mail-trimmed-body">Lorem ipsium dolor sit amet, consectetur adipiscing ..</span>
                      </div>
                    </a>
                  </td>
                  <td class="td-85px padding-right-25">
                    <span class="light-gray-font">Jun 20</span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
  <div class="be-block-pagination">
    <input type="hidden" id="mailbox-data-offset" value="0">
    <button type="button" id="mailbox-prev" title="previous">
      <i class="fa fa-caret-left" aria-hidden="true"></i>prev
    </button>
    <button type="button" id="mailbox-next" title="next">
      next<i class="fa fa-caret-right" aria-hidden="true"></i>
    </button>
  </div>
</div>
