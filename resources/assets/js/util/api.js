let axios=require('axios')

var sendUserInfo = (name, email) => {
axios.post('/api/user', {
    'name': name,
    'email': email,
    }).then(() => {
        console.log('ok');
        window.location.href = '/presentation'
    }).catch(error => {
        console.log(error)
    })
}


var checkUploadHistory = (name, email) => {
    axios.post('/api/admin/checkUploadHistory', {
        // 'name': name,
        // 'email': email,
        }).then((data) => {
            console.log('ok'+data);
            // window.location.href = '/presentation'
        }).catch(error => {
            console.log(error)
        })
    }
    

export default{
    sendUserInfo,checkUploadHistory
}