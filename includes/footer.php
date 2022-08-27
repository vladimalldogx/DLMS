
    </div>





        </div>
    </div>
</body>
</html>

<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="./assets/scripts/main.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/myjs.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/sweetalert.js"></script>
<!-- <script type="text/javascript" src="js/myjs.js"></script> -->
<script>
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




