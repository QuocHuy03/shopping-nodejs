module.exports = function Cart(cart) {
  this.items = cart.items || {};
  this.totalItems = cart.totalItems || 0;
  this.totalPrice = cart.totalPrice || 0;

  this.add = function (item, id) {
    var cartItem = this.items[id];
    // console.log(cartItem);
    if (!cartItem) {
      cartItem = this.items[id] = { item: item, quantity: 0, price_product: 0 };
    }
    cartItem.quantity++;
    cartItem.price_product = cartItem.item.price_product * cartItem.quantity;
    this.totalItems++;
    this.totalPrice += cartItem.price_product;
    // console.log(this.totalPrice)
  };

  this.remove = function (id) {
    this.totalItems -= this.items[id].quantity;
    this.totalPrice -= this.items[id].price_product;
    delete this.items[id];
    
  };

  this.getItems = function () {
    var arr = [];
    for (var id in this.items) {
      arr.push(this.items[id]);
    }
    return arr;
  };
};
