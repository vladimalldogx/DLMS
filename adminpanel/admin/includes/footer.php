<!-- 
 <div class="app-wrapper-footer">
    <div class="app-footer">
        <div class="app-footer__inner">
            <div class="app-footer-left">
                <ul class="nav">
                    <li class="nav-item">
                        <a href="javascript:void(0);" class="nav-link">
                            Footer Link 1
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0);" class="nav-link">
                            Footer Link 2
                        </a>
                    </li>
                </ul>
            </div>
            <div class="app-footer-right">
                <ul class="nav">
                    <li class="nav-item">
                        <a href="javascript:void(0);" class="nav-link">
                            Footer Link 3
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0);" class="nav-link">
                            <div class="badge badge-success mr-1 ml-0">
                                <small>NEW</small>
                            </div>
                            Footer Link 4
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>  -->
         
    </div>





                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
<script type="text/javascript" src="./assets/scripts/main.js"></script></body>
</html>



<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/myjs.js"></script>
<script src="js/chart-pie-demo.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/sweetalert.js"></script>
<script type="text/javascript" src="js/facebox.js"></script>
<script>
$(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="lessonLink[]" placeholder="Add Youtube Link" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  

});
function disableFile() {
  document.getElementById("lessonFile").disabled = true;

}
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}


</script>




<!-- <script type="text/javascript" src="js/myjs.js"></script> -->




