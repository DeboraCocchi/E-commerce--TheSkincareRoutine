import {reactive} from 'vue'

export const store =reactive({
    products:[],
    apiUrl: ' http://127.0.0.1:8000/api/products',
    category:'',
    searchbar:'',
    cart:[],
    total:0,
})
