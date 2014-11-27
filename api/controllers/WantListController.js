/**
 * WantListController
 *
 * @description :: Server-side logic for managing wantlists
 * @help        :: See http://links.sailsjs.org/docs/controllers
 */

module.exports = {

    add: function(req, res) {

        var cardId = req.param('cardId');
        var userId = req.param('user');
        var qty = req.param('qty');
        var cond = req.param('condition');

        WantList.findOne({
            card        : cardId,
            user        : userId,
            condition   : cond
        }).exec(function(err, result) {
            if (err) {
                res.badRequest('There was an error. Please try again.', 'search/index');
            } else {
                if (!result) {
                    WantList.create({
                        user        : userId,
                        card        : cardId,
                        condition   : cond,
                        qty         : qty
                    }).exec(function(err,wants) {
                        if (err) {
                            res.badRequest('There was an error. Please try again.', 'card/' + cardId);
                        } else {
                            res.redirect(sails.getBaseurl() + '/card/' + cardId);
                        }
                    });
                } else {
                    if (parseInt(qty) * -1 >= parseInt(result.qty)) {
                        var total = 0;
                    } else {
                        var total = parseInt(qty) + parseInt(result.qty);
                    }
                    WantList.update({
                        card : cardId,
                        user : userId,
                        condition : cond
                    }, {
                        qty : total
                    }).exec(function(err,wants) {
                        if (err) {
                            res.badRequest('There was an error. Please try again.', 'card/' + cardId);
                        } else {
                            res.redirect(sails.getBaseurl() + '/card/' + cardId);
                        }
                    });
                }
            }
        });
    }

};

