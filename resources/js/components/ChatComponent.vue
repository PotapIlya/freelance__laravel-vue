<template>
  <div class="d-flex flex-column">
      <h2>Chat</h2>

    <form @submit.prevent="save" class="d-flex align-items-center">
      <input v-model="input" class="w-75">
      <button type="submit" class="w-25 btn btn-success">Save</button>
    </form>

    <ul
        v-if="arrayMessage.length"
        class="my-3 list-inline">

      <li v-for="item in arrayMessage">
        <span class="d-block h4">{{ item.message }}</span>
        <hr>
      </li>

    </ul>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: "ChatComponent",
  data: () => ({
    arrayMessage: [],
    input: '',
    url: '/message',
  }),
  mounted() {
      console.log('Chat init')

    window.Echo.channel('chat')
        .listen('NewMessage', ({message}) => {
          console.log(message)
            console.log(12)
          this.arrayMessage.push({message: message});
        })

  },
  created() {

  },
  methods: {
    save() {
      if (this.input !== '') {
        axios.post(this.url, {
          data: this.input,
          id: 1,
        })
        .then(response => {
            // console.log(response)
          if (response) {
            this.input = '';
          }
        })
      }
    }
  },
}
</script>
