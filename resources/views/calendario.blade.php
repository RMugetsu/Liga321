@include('home')

<div id="calendario"></div>
<script>
var mes = 0;

tabla(mes);

$("#calendario").on("click", "#anterior", function(){
  mes -=1
  tabla(mes);
})

$("#calendario").on("click", "#siguiente", function(){
  mes +=1
  tabla(mes);
})

</script>


<style>
.table {
  text-align: center;
}
<<<<<<< HEAD
*/
</script>
=======
</style>
>>>>>>> d8849a6173bfb5488171bf6a57bcaba6f7aa61aa