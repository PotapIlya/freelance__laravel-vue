<template>
    <div class="d-flex flex-column">

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
    props: ['chat'],
    data: () => ({
        arrayMessage: [],
        input: null,
        url: '/message',
    }),
    mounted() {
        // this.arrayMessage = this.chat

        window.Echo.channel('test')
            .listen('NewMessage', ({message}) =>
            {
                console.log(message)
                this.arrayMessage.push({ message: message});
            })

    },
    created() {

    },
    methods: {
        save()
        {
            if (this.input !== '' && this.input !== null)
            {
                axios.post(this.url, {
                    data: this.input,
                    id: 2,
                })
                    .then(response =>{
                        if (response)
                        {
                            this.input = null;
                        }
                    })
            }
        }
    },
}
</script>
