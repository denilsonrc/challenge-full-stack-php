import axios from 'axios'

export const http = axios.create({
    baseURL: 'http://localhost:80/challenge-full-stack-php/EdTechSystem/controllers/'
})