<style>
/*Ovride*/
.pagination>li>a, .pagination>li>span{float:none!important}
.pagination{margin: 0 0!important}
</style>
<br/>
<div class="row">
    <div class="col-lg-12">
        <a href="<?php echo base_url()?>katalog" class="btn btn-success"><i class="fa fa-lightbulb-o"></i> Lampu</a>
        <a href="<?php echo base_url()?>katalog/fixture" class="btn btn-warning"><i class="fa fa-puzzle-piece"></i> Fixture</a>
        <a href="<?php echo base_url()?>katalog/accesories" class="btn btn-info"><i class="fa fa-bell-o"></i> Accesories</a>
        
         <form role="form" class="pull-right">
             <div class="form-group input-group">
                <input type="text" class="form-control" id="search" placeholder="Search..." x-webkit-speech>
                <span class="input-group-btn">
                    <button class="btn btn-default" id="btn-search"><i class="fa fa-search"></i></button>
                </span>
              
            </div>
        </form> 
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <b>Accesories</b>
                <div class="pull-right">
                    <ul class="pagination"></ul>    
                 </div> 
            </div>
            <!-- /.panel-heading -->
             <div class="panel-body" id="katalog-body">
                
                <!--Appended here-->
           </div>
    </div>
</div>


</div>
<!-- /#page-wrapper -->
<script>
    
    function get_data(url,q){
        
        if(!url)
            url = base_url+'katalog/get_accesories';
        
        $.ajax({
            
            url:url,type:'post',dataType:'json',
            data:{q:q},
            success:function(result){
                
                $("#katalog-body").html(result.rows);
                $("ul.pagination").html(result.paging);
                $(".page-info").html(result.page_info);
            }
        
        });
    } 
    function do_search(){
    
                
        get_data('',$("#search").val());
      
    }
    $(function(){
    
        get_data();//initialize
        
        $(document).on('click',"ul.pagination>li>a",function(){
        
            var href = $(this).attr('href');
            get_data(href);
            
            return false;
        });
        
        $("#search").keypress(function(e){
            
            var key= e.keyCode ? e.keyCode : e.which ;
            if(key==13){ //enter
                
                do_search();
            }
            
        });
        
        $("#btn-search").click(function(){
            
            do_search();
            
            return false;
        });
        
    });

</script>
