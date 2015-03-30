/**
 * TradeController
 *
 * @description :: Server-side logic for managing trades
 * @help        :: See http://links.sailsjs.org/docs/controllers
 */

module.exports = {

    myTrades: function(req,res) {

        if(req.param('user')) {
            var userId = req.param('user');
        } else {
            var userId = null;
        }

        Trade.find().where({or:[{receiver:userId},{sender:userId}]})
            .populate('receiverCards')
            .populate('senderCards')
            .populate('sender')
            .populate('receiver')
            .populate('status')
            .exec(function(err,trades) {
                if(err) {
                    res.badRequest('There was an error. Please try again.', '500');
                } else {
                    if(trades.length === 0) {
                        res.notFound({trades: null}, 'trade/myTrades');
                    } else {
                        res.ok({trades: trades}, 'trade/myTrades');
                    }
                }
            });

    }

};

