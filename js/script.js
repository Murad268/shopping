const form = document.querySelector("#menuekleform");
const inputs = document.querySelectorAll("#menuekleform textarea");
if(form && inputs) {
 form.addEventListener("submit", () => {
   inputs.forEach(input => {
     input.value = input.value.replace(/\r?\n/g, '<br />');
   })
  })
}