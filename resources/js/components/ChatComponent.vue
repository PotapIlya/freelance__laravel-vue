<template>
  <div className="d-flex flex-column">

    <form @submit.prevent="save" class="d-flex align-items-center">
      <input v-model="input" className="w-75">
      <button type="submit" className="w-25 btn btn-success">Save</button>
    </form>

    <ul
        v-if="arrayMessage.length"
        className="my-3 list-inline">

      <li v-for="item in arrayMessage">
        <span className="d-block h4">{{ item.message }}</span>
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


    window.Echo.channel('presence-room.'+1)
        .listen('NewMessage', ({message}) => {
          console.log(message)
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