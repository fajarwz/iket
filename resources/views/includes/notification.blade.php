@foreach (['update', 'add'] as $msg)
    @if(Session::has('alert-success-'.$msg))
        @push('after-script')
            {{-- bootstrap-notify  --}}
            <script src="{{ asset('assets/js/plugins/bootstrap-notify.min.js') }}" type="text/javascript"></script>

            <script>
                $.notify(
                    {
                        message: "<strong>Sukses</strong> - {{ Session::get('alert-success-'.$msg) }}"
                    }, 
                    {
                        type: 'success',
                        timer: 2000,
                        placement: {
                            from: 'bottom',
                            align: 'left'
                        }
                    }
                );
            </script>

        @endpush  
    @endif
@endforeach