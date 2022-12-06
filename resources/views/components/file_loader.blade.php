@props([
  'name' => 'image',
  'image' => null
])

<div class="file_loader">
  <label class="form-label">
    Image
  </label>

  <div class="input-group">
    <input
      value="{{ $image }}"
      type="text"
      name="{{ $name }}"
      class="file_loader__text visually-hidden"
    >
    <input
      type="file"
      class="file_loader__file form-control"
    >

    <x-file_manager />
    <button
      type="button"
      class="file_loader__load btn btn-primary"
    >
      Load
    </button>
  </div>

  <div class="mt-3">
    <div
      role="status"
      class="file_loader__status spinner-border text-danger"
      style="display: none;"
    >
      <span class="sr-only">Loading...</span>
    </div>

    <img
      src="{{ $image }}"
      class="file_loader__img d-block w-25"
    >
  </div>
</div>
<script>
  const $elFile = $('.file_loader__file')[0]
  const $elText = $('.file_loader__text')
  const $elStatus = $('.file_loader__status')
  const $elImg = $('.file_loader__img')

  $('.file_loader__load').on('click', function () {
    load()
  })

  document.addEventListener('onselect', function (event) {
    const path = event.detail
    setPath(path)
  })

  function setPath (path) {
    $elText.val('/storage/' + path)
    $elImg.attr('src', '/storage/' + path)
  }

  function clearPath () {
    $elText.val('')
    $elImg.attr('src', '')
  }

  function load () {
    const formData = new FormData();
    formData.append('file', $elFile.files[0], $elFile.files[0].name);

    $elStatus.show()
    this.loading = true
    $.ajax({
      type: "POST",
      url: "/api/image-loader",
      xhr: () => {
        const _Xhr = $.ajaxSettings.xhr();
        if (_Xhr.upload) {
          _Xhr.upload.addEventListener('progress', (event) => {
            this.percent = 0;
            const position = event.loaded || event.position;
            const total = event.total;
            if (event.lengthComputable) {
              this.percent = Math.ceil(position / total * 100);
            }
          }, false);
        }
        return _Xhr;
      },
      success: (path) => {
        setPath(path)
      },
      error: () => {
        clearPath()
      },
      complete: () => {
        $elStatus.hide()
      },
      async: true,
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      timeout: 60000
    })
  }
</script>