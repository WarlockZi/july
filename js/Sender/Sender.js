export default class Sender {

  async send(url, data) {
        this.url = url
    this.formData = new FormData
    for (let el in data) {
      this.formData.append(el, data[el])
    }

    let res = await fetch(this.url, {
      method: "POST",
      body: this.formData
    })

    if (this.isJson(res)) {
      return await res.json()
    }
    return await res.text()
  }

  async isJson(str) {
    try {
      await JSON.parse(str);
    } catch (e) {
      return false;
    }
    return true;
  }


}