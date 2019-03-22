@if (file_exists(public_path('vendor/gpibarra/plugins/pnotify/pnotify.custom.min.js')))
<script src="{{ asset('vendor/gpibarra/') }}/plugins/pnotify/pnotify.custom.min.js"></script>

@if (Alert::getMessages())
{{-- Bootstrap Notifications using Prologue Alerts --}}
<script>
  jQuery(document).ready(function($) {

    PNotify.prototype.options.styling = "bootstrap3";
    PNotify.prototype.options.styling = "fontawesome";
    PNotify.prototype.options.delay = 5000;

    @foreach (Alert::getMessages() as $type => $messages)
        @foreach ($messages as $message)

            $(function(){
              new PNotify({
                // title: 'Regular Notice',
                text: "{{ $message }}",
                type: "{{ $type }}",
                icon: false
              });
            });

        @endforeach
    @endforeach
  });
</script>
@endif
@endif