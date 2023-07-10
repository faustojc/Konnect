  <!-- aside -->
  <div id="aside" class="app-aside box-shadow-z3 modal fade lg nav-expand" ng-class="{'folded': app.setting.folded}">
  	<div class="left navside white dk" layout="column">
      <div class="navbar navbar-md {{app.setting.theme.primary}} no-radius box-shadow-z4">
        <div ui-include="'../pos/assets/theme/views/blocks/navbar.brand.white.html'"></div>
      </div>
      <div flex class="hide-scroll">
        <nav class="scroll">
          <div ui-include="'../pos/assets/theme/views/blocks/aside.top.4.html'"></div>
          <div ui-include="'../pos/assets/theme/views/blocks/nav.html'"></div>
        </nav>
      </div>
      <div flex-no-shrink>
        <div ui-include="'../pos/assets/theme/views/blocks/aside.bottom.1.html'"></div>
      </div>
    </div>
  </div>
  <!-- / aside -->
  
  <!-- content -->
  <div id="content" class="app-content box-shadow-z3" role="main">
    <div class="app-header {{app.setting.theme.primary}} box-shadow-z4 navbar-md">
        <div ui-include="'../pos/assets/theme/views/blocks/header.html'"></div>
    </div>
    <div class="app-footer">
      <div ui-include="'../pos/assets/theme/views/blocks/footer.html'"></div>
    </div>
    <div ui-view class="app-body" id="view"></div>
  </div>
  <!-- / -->

  <!-- theme switcher -->
  <div id="switcher">
    <div ui-include="'../pos/assets/theme/views/blocks/switcher.html'"></div>
  </div>
  <!-- / -->
