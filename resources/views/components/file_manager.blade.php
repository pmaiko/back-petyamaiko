<div class="file_manager">
  <button
    type="button"
    class="file_manager__open-modal btn btn-warning"
  >
    Manager
  </button>

  <!-- Modal -->
  <div
    class="modal fade"
    id="fileManagerModal"
    tabindex="-1"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5">FILE MANAGER</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Loading...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button
            type="button"
            class="btn btn-primary"
            data-bs-dismiss="modal"
          >
            Save changes
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  //vars
  const modalInstance = new bootstrap.Modal('.file_manager #fileManagerModal', {})

  //data
  const $data = {}
  const _$data = {
    files: [],
    active_path: null
  }
  Object.keys(_$data).forEach(key => {
    Object.defineProperty($data, key, {
      get () {
        return _$data[key]
      },
      set (newVal) {
        _$data[key] = newVal
        render()
      }
    })
  })

  //elements
  const $elOpenModal = $('.file_manager__open-modal')
  const $elBodyModal = $('.file_manager .modal-body')

  //listeners
  $elOpenModal.on('click', openModal)

  //methods
  function openModal() {
    $.ajax({
      type: "GET",
      url: "/api/storage/all",
      success: (data) => {
        $data.files = data
      },
      async: true,
      cache: false,
      contentType: false,
      processData: false,
      timeout: 60000
    })

    modalInstance.show()
  }

  function onActive(path) {
    $data.active_path = path

    // const event = document.createEvent('HTMLEvents');
    // event.initEvent('onselect', true, true);
    // event.eventName = "onselect";

    const event = new CustomEvent('onselect', {detail: path});
    document.dispatchEvent(event);
  }

  function onRemove(path) {
    $.ajax({
      type: "DELETE",
      url: `/api/storage/${path}`,
      async: true,
      cache: false,
      contentType: false,
      processData: false,
      timeout: 60000
    })

    $data.files = $data.files.filter(file => file.path !== path)
  }

  function render () {
    const template = `
<div class="row">
${$data.files.map(file => (
`
  <div
    :key="${file.path}"
    class="col col-4 mb-5"
  >
    <div
      data-path="${file.path}"
      role="button"
      class="card ${$data.active_path === file.path ? 'shadow-lg bg-body rounded border border-3 border-success' : ''}"
    >
      <img
        src="/storage/${file.path}"
        class="card-img-top"
        alt="file"
      >
      <div class="card-body">
        <p class="card-text">
          ${ file.name }
        </p>
      </div>

      <button
        data-path="${file.path}"
        type="button"
        class="remove btn btn-danger"
      >
        Remove
      </button>
    </div>
  </div>
`
)).join('')}
</div>
    `

    $elBodyModal.html(template)

    const $elCard = $('.file_manager .card')
    const $elRemove = $('.file_manager .remove')

    $elCard.on('click', function (event) {
      onActive($(event.currentTarget).attr('data-path'))
    })
    $elRemove.on('click', function (event) {
      onRemove($(event.currentTarget).attr('data-path'))
    })
  }
</script>