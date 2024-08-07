<input type="hidden" id="previous_url"  value="{{$previous_url}}" >
<script>
    do_logout()
    function do_logout (url_logout){
        localStorage.clear()
        var previous_url = document.getElementById("previous_url").value
        if(previous_url){
            previous_url = '?page='+previous_url
        }
        window.location.href = '/auth/login'+previous_url
    }
</script>