<script src="Scripts/jquery-1.6.4.min.js" type="text/javascript"></script>
<script src="Scripts/jquery.signalr-2.2.0.js" type="text/javascript"></script>

<script>
    var connection         = $.hubConnection('Hub conection with signalr');                
    var hubProxyConnection = connection.createHubProxy('Connection hub with server roles'); 

    connection.logging = true;
    
//    Example:
//        
//    var headers = {
//        Authorization: "Basic zApc2tvMA==",
//        Cookie: "ss-opt=temp; X-UAId=0000; ss-pid=JjxQQUfd"
//    };
    
    connection.addHeaders('headers'); // Inform the header according to the example above
    
    connection.stateChanged(function(state) 
    {
        console.log('STATE: ' + state.newState);
    });    
    
    hubProxyConnection.on('Name of the role that you are listening for', function(data)
    {
        console.log(data); 
    }); 
    
    // After informing all functions, call the Start function
    
    connection.start({ transport: ['webSockets', 'longPolling'], withCredentials: true})
    .done(function()
    {             
        console.log('Connected Id:' + connection.id);     
    })
    .fail(function(error)
    { 
        console.log(error); 
    });
</script>



