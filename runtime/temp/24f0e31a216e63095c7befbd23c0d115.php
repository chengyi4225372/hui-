<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:74:"/opt/web/hui-/public/../application/v1/view/systematic/cases/editcase.html";i:1571740262;s:52:"/opt/web/hui-/application/v1/view/layout/dialog.html";i:1571369306;s:50:"/opt/web/hui-/application/v1/view/common/meta.html";i:1571642226;s:52:"/opt/web/hui-/application/v1/view/common/script.html";i:1571723378;}*/ ?>
<!DOCTYPE html>
<html lang="<?php echo $config['language']; ?>">
<head>
    <!-- 加载样式及META信息 -->
    <meta charset="utf-8">
<title><?php echo (isset($title) && ($title !== '')?$title:''); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="renderer" content="webkit">
<link rel="shortcut icon" href="/static/assets/img/favicon.ico" />
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="/static/assets/components/bootstrap/dist/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="/static/assets/components/font-awesome/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="/static/assets/components/Ionicons/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="/static/assets/dist/css/AdminLTE.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="/static/assets/dist/css/skins/_all-skins.min.css">
<!-- Date Picker -->
<link rel="stylesheet" href="/static/assets/components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<!-- Daterange picker -->
<link rel="stylesheet" href="/static/assets/components/bootstrap-daterangepicker/daterangepicker.css">
<!--bootstrap-select-->
<link rel="stylesheet" href="/static/assets/components/bootstrap-select/css/bootstrap-select.css">
<!--jstree-->
<link rel="stylesheet" href="/static/assets/components/jstree/themes/default/style.min.css"/>
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="/static/assets/plugins/iCheck/all.css">
<!--layui-->
<link rel="stylesheet" href="/static/assets/plugins/layui/css/layui.css">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- Font -->
<link rel="stylesheet" href="/static/assets/dist/css/fontcss.css">
<link rel="stylesheet" href="/static/assets/dist/css/style.css">
<link rel="stylesheet" href="/static/assets/plugins/datatables/dataTables.bootstrap.css">
<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!--[if lt IE 9]>
  <script src="/static/assets/dist/js/html5shiv.js"></script>
  <script src="/static/assets/dist/js/respond.min.js"></script>
<![endif]-->

    
    <!-- 用来添加自定义的 样式 -->
    
</head>
<body class="hold-transition skin-purple-light sidebar-mini">
<div class="container-fluid">
    
<style>
    .dialog-content{margin:20px;}
    .dialog-footer{position:fixed;right:39%;top:82%}
    .red-color{color:red;}
</style>
<div class="dialog-content">
    <form class="form-horizontal dialog-form" id="form">
        <div class="row">
            <div class="col-md-9">
                <div class="form-group">
                    <label for="title" class="col-sm-3 control-label">标题：</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control form-control-sm" id="title" name="title" value="<?php echo $data['title']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="title2" class="col-sm-3 control-label">标题2：</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control form-control-sm" id="title2" name="title2">
                    </div>
                </div>
                <div class="form-group">
                    <label for="title3" class="col-sm-3 control-label">标题3：</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control form-control-sm" id="title3" name="title3">
                    </div>
                </div>

                <div class="form-group">
                    <label for="pic" class="col-sm-3 control-label">图片：</label>
                    <div class="col-sm-9">
                        <button type="button" class="layui-btn" id="pic">
                            <i class="layui-icon">&#xe67c;</i>上传图片
                        </button>
                        <img src="/static/default.png" style="width:50px;height:50px;" id="cur_pic"/>
                        <input type="hidden" name="pic_curr" id="pic_curr" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="url" class="col-sm-3 control-label">URL：</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control form-control-sm" id="url" name="url">
                    </div>
                </div>

                <div class="form-group">
                    <label for="desc" class="col-sm-3 control-label">描述：</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control form-control-sm" id="desc" name="desc" value="<?php echo $data['desc']; ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="desc2" class="col-sm-3 control-label">描述2：</label>
                    <div class="col-sm-9">
                        <input type="text" id="desc2" class="form-control form-control-sm" name="desc2" value="<?php echo $data['desc2']; ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="desc3" class="col-sm-3 control-label">描述3：</label>
                    <div class="col-sm-9">
                        <input type="text" id="desc3" class="form-control form-control-sm" name="desc3" value="<?php echo $data['desc3']; ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="desc4" class="col-sm-3 control-label">描述4：</label>
                    <div class="col-sm-9">
                        <input type="text" id="desc4" class="form-control form-control-sm" name="desc4" value="<?php echo $data['desc4']; ?>"/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="desc5" class="col-sm-3 control-label">描述5：</label>
                    <div class="col-sm-9">
                        <input type="text" id="desc5" class="form-control form-control-sm" name="desc5" value="<?php echo $data['desc5']; ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="desc6" class="col-sm-3 control-label">描述6：</label>
                    <div class="col-sm-9">
                        <input type="text" id="desc6" class="form-control form-control-sm" name="desc6" value="<?php echo $data['desc6']; ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="desc7" class="col-sm-3 control-label">描述7：</label>
                    <div class="col-sm-9">
                        <input type="text" id="desc7" class="form-control form-control-sm" name="desc7" value="<?php echo $data['desc7']; ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="status" class="col-sm-3 control-label">状态：</label>
                    <div class="col-sm-9">
                        <select id="status" name="status" class="form-control form-control-sm">
                            <?php if(is_array($status) || $status instanceof \think\Collection || $status instanceof \think\Paginator): $i = 0; $__LIST__ = $status;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$status_list): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $key; ?>" <?php if($key == $data['status']): ?>selected=selected<?php endif; ?>><?php echo $status_list; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="is_show" class="col-sm-3 control-label">是否显示：</label>
                    <div class="col-sm-9">
                        <select id="is_show" name="is_show" class="form-control form-control-sm">
                            <?php if(is_array($is_show) || $is_show instanceof \think\Collection || $is_show instanceof \think\Paginator): $i = 0; $__LIST__ = $is_show;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$is_show_list): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $key; ?>"><?php echo $is_show_list; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </div>
                </div>

            </div>
        </div>
        <div class="td-align dialog-footer" style="top:90%;">
            <button class="btn btn-warning" onclick="admin_module.cancel_btn()"> <i class="fa fa-close"></i> 取消</button>
            <input type="hidden" id="case_id" name="case_id" value="<?php echo $data['id']; ?>">
            <button class="btn btn-primary" type="button" onclick="admin_module.case_edit(this)" data-url="<?php echo url('/v1/systematic/cases/editcase'); ?>"><i class="fa fa-save"></i> 确定提交</button>
        </div>
    </form>
</div>

</div>

<!-- 加载JS脚本 -->
<!-- jQuery 3 -->
<script src="/static/assets/components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/static/assets/components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- daterangepicker -->
<script src="/static/assets/components/moment/min/moment.min.js"></script>
<script src="/static/assets/components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="/static/assets/components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!--bootstrap-select-->
<script src="/static/assets/components/bootstrap-select/js/bootstrap-select.js"></script>
<!--jstree-->
<script src="/static/assets/components/jstree/jstree.min.js"></script>
<!-- ValidateForm -->
<script src="/static/assets/components/nice-validator/dist/jquery.validator.min.js?local=zh-CN"></script>
<!-- Slimscroll -->
<script src="/static/assets/components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- Scrolltofixed -->
<script src="/static/assets/components/scrolltofixed/jquery-scrolltofixed-min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="/static/assets/plugins/iCheck/icheck.min.js"></script>
<!-- AdminLTE App -->
<script src="/static/assets/dist/js/adminlte.min.js"></script>
<script src="/static/assets/plugins/layui/layui.all.js"></script>
<script src="/static/assets/plugins/laydate-v5.0/laydate.js"></script>
<script src="/static/assets/plugins/lazyload.js"></script>
<!-- datatables -->
<script src="/static/assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="/static/assets/plugins/datatables/dataTables.bootstrap.js"></script>
<!-- 富文本 -->
<script src="/static/assets/plugins/ueditor//ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/static/assets/plugins/ueditor/ueditor.all.js"> </script>
<script type="text/javascript" charset="utf-8" src="/static/assets/plugins/ueditor/lang/zh-cn/zh-cn.js"></script>
<!-- 富文本-->

<script src="/static/assets/dist/js/default.js"></script>
<script src="/static/assets/dist/js/app.js"></script>
<script src="/static/assets/dist/js/style.js"></script>

<script src="/static/assets/dist/js/protuct.js"></script>
<script src="/static/assets/dist/js/infos.js"></script>
<script src="/static/assets/dist/js/partners.js"></script>
<script>
    admin_module.changepas();
</script>
<!--<script src="/static/assets/dist/js/common.js"></script>-->




</body>
</html>