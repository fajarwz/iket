<!--   Core JS Files   -->
<script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{ asset('assets/js/plugins/bootstrap-switch.js') }}"></script>
<!--  Chartist Plugin  -->
<script src="{{ asset('assets/js/plugins/chartist.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="{{ asset('assets/js/light-bootstrap-dashboard.js?v=2.0.0 ') }}" type="text/javascript"></script>

<script>
jQuery(document).ready(function($){
  $('#dynModal').on('show.bs.modal', function(e){
      let button  = $(e.relatedTarget);
      let modal   = $(this);

      modal.find('.modal-body').load(button.data('remote'));
      modal.find('.modal-title').html(button.data('title'));
      $("#dynModalForm").attr("action", button.data('action'));
  })
})
</script>

<div class="modal fade" id="dynModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title font-weight-bold"></h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>  
          </div>
          <form method="post" action="" id="dynModalForm">
            @csrf
            <div class="modal-body">
                {{-- <i class="fa fa-spinner fa-spin"></i> --}}
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary mr-2">Save changes</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </form>
      </div>
  </div>
</div>
