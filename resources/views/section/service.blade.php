<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <!-- Thêm jQuery từ CDN -->
</head>
<body>
    <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                @foreach ($sections as $section)
                    @if ($section->cos === "1")
                        <h2 class="editableService" data-id="{{ $section->id }}" data-field="text_1" contenteditable="true">{{ $section->text_1 }}</h2>
                        <h3 class="section-subheading text-muted editableService" data-id="{{ $section->id }}" data-field="text_2" contenteditable="true">{{ $section->text_2 }}</h3>
                    @endif
                @endforeach
            </div>
            <div class="row text-center">
                @foreach ($sections as $section)
                @if ($section->cos === "1")
                        <div class="col-md-4">
                            <span class="fa-stack fa-4x">
                                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                            </span>
                            <h4 class="my-3 editableService" data-id="{{ $section->id }}" data-field="text_3" contenteditable="true">{{ $section->text_3 }}</h4>
                            <p class="text-muted editableService" data-id="{{ $section->id }}" data-field="text_4" contenteditable="true">{{ $section->text_4 }}</p>
                        </div>
                        <div class="col-md-4">
                            <span class="fa-stack fa-4x">
                                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                            </span>
                            <h4 class="my-3 editableService" data-id="{{ $section->id }}" data-field="text_5" contenteditable="true">{{ $section->text_5 }}</h4>
                            <p class="text-muted editableService" data-id="{{ $section->id }}" data-field="text_6" contenteditable="true">{{ $section->text_6 }}</p>
                        </div>
                        <div class="col-md-4">
                            <span class="fa-stack fa-4x">
                                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
                            </span>
                            <h4 class="my-3 editableService" data-id="{{ $section->id }}" data-field="text_7" contenteditable="true">{{ $section->text_7 }}</h4>
                            <p class="text-muted editableService" data-id="{{ $section->id }}" data-field="text_8" contenteditable="true">{{ $section->text_8 }}</p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <div id="notification" class="alert" style="display:none;"></div>
    </section>

    <!-- Script jQuery để chỉnh sửa nội dung -->
    <script>
        $(document).ready(function() {
            $('.editableService').on('focus', function() {
                $(this).data('original-text', $(this).text());
            }).on('blur', function() {
                var $this = $(this);
                var id = $this.data('id');
                var field = $this.data('field');
                var originalText = $this.data('original-text');
                var newText = $this.text();
                
                if (originalText !== newText) {
                    $.ajax({
                        url: '{{ route("section.updateService") }}', // URL đến route xử lý cập nhật
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: id,
                            field: field,
                            value: newText
                        },
                        success: function(response) {
                            if(response.success) {
                                showNotification('success', 'Content updated successfully');
                            } else {
                                showNotification('danger', 'Failed to update content');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error: ' + status + error);
                            showNotification('danger', 'Failed to update content');
                        }
                    });
                }
            });

            function showNotification(type, message) {
                var $notification = $('#notification');
                $notification.removeClass('alert-success alert-danger').addClass('alert-' + type).text(message).fadeIn();
                setTimeout(function() {
                    $notification.fadeOut();
                }, 3000);
            }
        });
    </script>
</body>
</html>
