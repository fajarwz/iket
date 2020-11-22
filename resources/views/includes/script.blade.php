<!--   Core JS Files   -->
<script src="{{ asset('assets/js/core/jquery.3.5.1.min.js') }}" type="text/javascript"></script>
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
{{-- DataTables  --}}
<script src="{{ asset('assets/js/datatables.min.js') }}" type="text/javascript"></script>

<script>
  $(function() {
      $('#request-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: '{{ route('user.request.json') }}',
          columns: [
              {data: 'id', name: 'id'},
              {data: 'request_created_date', name: 'request_created_date'},
              {data: 'client_name', name: 'client_name'},
              {data: 'department.name', name: 'department.name'},
              {data: 'computer.ip', name: 'computer.ip'},
              {data: 'break_type.name', name: 'break_type.name'},
              {data: 'kind_of_repair', name: 'kind_of_repair'},
              {data: 'description', name: 'description'},
              {data: 'action', name: 'action'} 
          ]
      });

      $('#f-up-request-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: '{{ route('technician.f-up-request.json') }}',
          columns: [
              {data: 'id', name: 'id'},
              {data: 'user_request.request_created_date', name: 'user_request.request_created_date'},
              {data: 'user_request.client_name', name: 'user_request.client_name'},
              {data: 'user_request.break_type.id', name: 'user_request.break_type.id'},
              {data: 'user_request.description', name: 'user_request.description'},
              {data: 'target_date', name: 'target_date'},
              {data: 'target_completion_date', name: 'target_completion_date'},
              {data: 'technician', name: 'technician'},
              {data: 'is_done', name: 'is_done'},
              {data: 'action', name: 'action'} 
          ]
      });
  });
  </script>

{{-- <script>
jQuery(document).ready(function($){
  $('#dynModal').on('show.bs.modal', function(e){
      let button  = $(e.relatedTarget);
      let modal   = $(this);

      modal.find('.modal-body').load(button.data('remote'));
      modal.find('.modal-title').html(button.data('title'));
      $("#dynModalForm").attr("action", button.data('action'));
  })
})
</script> --}}

{{-- <div class="modal fade" id="dynModal" tabindex="-1" role="dialog">
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
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary mr-2">Save changes</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </form>
      </div>
  </div>
</div> --}}

{{-- <script>
  $(document).ready(function(){
    $('#formSubmit').click(function(e){
        var createForm = $("#createForm");
        var formData = createForm.serialize();
        $.ajax({
            url: "{{ route('user.request.store') }}",
            type: 'POST',
            data: formData,
            success: function(result){
                if(result.errors)
                {
                    $('.alert-danger').html('');

                    $.each(result.errors, function(key, value){
                        $('.alert-danger').show();
                        $('.alert-danger').append('<li>'+value+'</li>');
                    });
                }
                else
                {
                    $('.alert-danger').hide();
                    $('#theModal').modal('hide');
                }
            }
        });
    });
});
</script> --}}