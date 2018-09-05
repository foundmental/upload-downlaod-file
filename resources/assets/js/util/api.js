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

export default{
    sendUserInfo
}