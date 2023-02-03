const email = document.getElementById('emailfield')
const pass = document.getElementById('passfield')
const form = document.getElementById('lgnform')
const error =document.getElementById('error')

form.addEventListener('submit' ,(e) =>{
   let messages = []
   if (email.value === '' || email.value == null)
   {
    messages.push('email is required')
   }
   if (pass.value === '' || pass.value == null)
   {
    messages.push('password is required')
   }
   if(messages.length > 0)
   {
    e.preventDefault()
    error.innerText = messages.join('\n')
   }
    
})