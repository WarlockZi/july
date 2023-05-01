export default class Sender {
  constructor(url, data) {
    this.url = url
    this.formData = new FormData
    for (let el in data) {
      debugger
      this.formData.append(el, data[el])
    }
  }

  async send(){
    let res = await fetch(this.url, {
      method: "POST",
      body: this.formData
    })
    return  await res.json()
  }

}