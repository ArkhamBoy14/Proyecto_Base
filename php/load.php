<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>cargando...</title>
<style type="text/css">
.cl {
        display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;
    }
</style>
</head>
<script>
       
        function redirecion(){
        location.href =" <?php 
        $url=$_GET['url'];
        echo $url;
        ?>";
        }

        setTimeout("redirecion()",700)
</script>
<body>
        
        <div class="cl">
                <br> <br> <br> <br>  <br> <br> <br>
            <img src="../img/l.gif"  alt="">
        </div>
</body>
</html>

