<template>
  <teleport to="body">
    <div class="modal fade" tabindex="-1" :id="id" :aria-labelledby="id" aria-hidden="true">
      <div class="modal-dialog" :class="maxWidthClass">
        <slot></slot>
      </div>
    </div>
  </teleport>
</template>

<script>
  import { defineComponent } from 'vue'

  export default defineComponent({
    props: {
      id: {
        type: String,
        required: true
      },
      maxWidth: {
        default: 'md'
      },
      backdrop:{
        default:null
      }
    },

    computed: {
      maxWidthClass() {
        return {
          'sm': 'modal-sm',
          'md': null,
          'lg': 'modal-lg',
          'xl': 'modal-xl',
        }[this.maxWidth]
      }
    }
  })
</script>
