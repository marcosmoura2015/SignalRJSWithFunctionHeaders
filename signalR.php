<script src="Scripts/jquery-1.6.4.min.js" type="text/javascript"></script>
<script src="Scripts/jquery.signalr-2.2.0.js" type="text/javascript"></script>

<script>

    var connection      = $.hubConnection('Hub conection with /signal');                
    var hubProxyConnection = connection.createHubProxy('Hub to connected functions'); 

    connection.logging = true;
    connection.addHeaders('Headers Object');
    
    connection.stateChanged(function(state) 
    {
        console.log('STATE: ' + state.newState);
    });    
    
    hubProxyConnection.on('Function Listened', function(data)
    {
        console.log(data); 
    }); 
    
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



