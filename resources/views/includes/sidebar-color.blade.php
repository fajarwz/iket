<script>
    let color = '';
  
    @if (Auth::user()->role == 'USER')
      color = 'purple';
    @elseif(Auth::user()->role == 'TECHNICIAN')
      color = 'orange';
    @elseif(Auth::user()->role == 'MANAGER')
      color = 'red';
    @endif 
  
    document.getElementById("sidebar").setAttribute("data-color", color);
</script>
  