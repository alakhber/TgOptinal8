var jimp = require("jimp");
var qrCode = require('qrcode-reader');

var fs = require('fs')
var path = require("path")

const args = process.argv.slice(2);
const readQRCode = async (fileName) => {
    const filePath = path.join(__dirname, fileName)
    try {
        if (fs.existsSync(filePath)) {
            const img = await jimp.read(fs.readFileSync(filePath));
            const qr = new qrCode();
            const value = await new Promise((resolve, reject) => {
                qr.callback = (err, v) => err != null ? reject(err) : resolve(v);
                qr.decode(img.bitmap);
            });
            return value.result;
        }
    } catch (error) {
        return error.message
    }
}

readQRCode(args[0]).then(console.log).catch(console.log)
