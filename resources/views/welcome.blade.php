<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
   
</head>


<body >
    <h1>asdasd</h1>

@vite('resources/js/app.js')
</body>


<script >


    setTimeout(()=>{
        window.Echo.channel('testChannel')
        .listen('Notification',(e)=>{
            console.log(e);
        })
    },200);


    

</script>

</html>