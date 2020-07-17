<html>
<head>
<script>
function second(e) {
        if (e.length == 0) {
            document.getElementById("show2").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("show2").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "test.php?email=" + e, true);
            xmlhttp.send();
        }
    }


</script>
</head>
<div id='show'>
FIRST
</div>
<div id='show2'>SECOND</div>
<button onclick="first();second('good');">CLICK ME</button>
<script>
function first(){
    document.getElementById('show').innerHTML="first";
}
</script>
</html>