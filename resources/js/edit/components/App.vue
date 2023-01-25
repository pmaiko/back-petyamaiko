<template>
  <select
    v-model="selected"
    class="form-select"
    aria-label="select block"
  >
    <option
      v-for="(item, index) in list"
      key="index"
      :selected="!index"
      :value="item.value"
    >
      {{ item.label }}
    </option>
  </select>

  <component
    :is="selected"
    :name="selected"
  />

  <div class="blocks">
    <component
      v-for="(block, index) in blocks"
      :key="index"
      :is="block.name"
      v-bind="block"
      :position="selected ? index + 1 : index"
      @up="onUp(index)"
      @down="onDown(index)"
    />
  </div>

  {{ message }}
</template>

<script>
import block_main_banner from "./blocks/block_main_banner.vue"
import block_projects from "./blocks/block_projects.vue"
import block_services from "./blocks/block_services.vue"
import block_about from "./blocks/block_about.vue"
import block_contacts from "./blocks/block_contacts.vue"

export default {
  components: {
    block_main_banner,
    block_projects,
    block_services,
    block_about,
    block_contacts
  },

  data() {
    return {
      message: '',
      blocks: window['blocks'],

      forceKey: 1,
      selected: null,
      list: [
        {
          label: 'NULL',
          value: null
        },
        {
          label: 'block_main_banner',
          value: 'block_main_banner',
        },
        {
          label: 'block_projects',
          value: 'block_projects'
        },
        {
          label: 'block_services',
          value: 'block_services'
        },
        {
          label: 'block_about',
          value: 'block_about'
        },
        {
          label: 'block_contacts',
          value: 'block_contacts'
        }
      ],
    }
  },

  methods: {
    onUp (index) {
      if (index) {
        const save_block = { ...this.blocks[index] }

        this.blocks = this.blocks.filter((block, blockIndex) => {
          return index !== blockIndex
        })

        this.blocks.splice(index - 1, 0, save_block)
      }
    },

    onDown (index) {
      if (index <= this.blocks.length) {
        const save_block = { ...this.blocks[index] }

        this.blocks = this.blocks.filter((block, blockIndex) => {
          return index !== blockIndex
        })

        this.blocks.splice(index + 1, 0, save_block)
      }
    }
  }
}
</script>