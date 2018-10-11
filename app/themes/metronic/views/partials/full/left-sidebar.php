<div class="page-sidebar-wrapper" id="page_sidebar_wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse ">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-closed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <!-- END SIDEBAR TOGGLER BUTTON -->
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
            <li class="sidebar-search-wrapper">
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                <form class="sidebar-search  " action="#" method="POST" style="display: none;">
                    <a href="javascript:;" class="remove">
                        <i class="icon-close"></i>
                    </a>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <a href="javascript:;" class="btn submit">
                                <i class="icon-magnifier"></i>
                            </a>
                        </span>
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>

<!-- START LOOP -->
<li v-bind:class="{'nav-item':true,'start':(uri==active_menu), 'active':(uri==active_menu) ,'open':(uri==active_menu)}" v-for="(uri,menu) in menus" v-if="jQuery.inArray('{{ user_group }}',menu.credentials) != -1">
    <a href="javascript:;" class="nav-link nav-toggle" v-bind:uri="uri">
        <i v-bind:class="menu.icon"></i>
        <span class="title">{{{menu.title}}}</span>
        <span v-bind:class="{'selected':(uri==active_menu)}"></span>
        <span v-bind:class="{'arrow':true,'open':(uri==active_menu)}"></span>
    </a>
    <ul class="sub-menu">
        <li v-bind:class="{'nav-item':true,'start':(url==active_item), 'active':(url==active_item), 'open':(url==active_item)}" v-for="(url,caption) in menu.items">
            <a v-bind:href="'{{ base_url }}'+url" class="nav-link ">
                <span class="title">{{{caption}}}</span>
            </a>
        </li>

    </ul>
</li>
<!-- END LOOP -->
</ul>
<!-- END SIDEBAR MENU -->
<!-- END SIDEBAR MENU -->
</div>
<!-- END SIDEBAR -->
</div>
<script type="text/javascript">
    $(document).ready(function(){
        var sidebar = new Vue({
            el:'#page_sidebar_wrapper',
            data:{
                menus:<?=json_encode(ci_config_item('main_menu'))?>,
                active_menu:'<?=$this->uri->segment(1)?>',
                active_item:'<?=$this->uri->segment(1).'/'.$this->uri->segment(2)?>',
                jQuery: jQuery
            }
        })
    });
</script>
