import {http} from './config'

export default {
    listAllStudents:() => {
        return http.get('StudentsController.php',{
            params: {
                op: 3
            }
        })
    },
    deleteStudent:(id) => {
        return http.get('StudentsController.php',{
            params:{
                op: 2,
                RA: id
            }
        })
    },
    insertStudent:(name, cpf, email) => {
        return http.get('StudentsController.php',{ 
            params: {
                op: 0,
                name: name, 
                cpf: cpf, 
                email: email
            }
        })
    },
    getStudent:(id)=>{
        return http.get('StudentsController.php',{ 
            params: {
                op: 4,
                RA: id 
            }
        })
    },
    updateStudent:(id, name, email) => {
        return http.get('StudentsController.php',{
            params:{
                op: 1,
                RA: id,
                name: name,
                email: email
            }
        })
    }
}