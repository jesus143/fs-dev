 
    <script src="http://connect.facebook.net/en_US/all.js"></script>
    <script> 
        function fbshare( ) {
             
             FB.init({ 
                appId:'528594163842974', cookie:true, 
                status:true, xfbml:true 
             });  
             FB.ui({ method: 'feed', 
                message: 'Facebook for Websites is super-cool',
                name: 'Facebook Dialogs',
                link: 'http://fashionsponge.com/lookdetails?id=191',
                picture: 'http://fashionsponge.com/fs_folders/images/uploads/posted looks/home/191.jpg',
                caption: 'This is a look Name',
                description: 'Fashionsponge allways make you happy...' 
            }); 
        }
    </script>