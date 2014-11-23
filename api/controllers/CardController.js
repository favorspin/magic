/**
 * CardController
 *
 * @description :: Server-side logic for managing cards
 * @help        :: See http://links.sailsjs.org/docs/controllers
 */

module.exports = {

    index: function (req, res) {

        var setId = req.param('setId');

        // this needs to be simplified
        if(!setId) {
            Card.find().exec(function(err, cards) {
                if(err) {
                    res.badREquest('There was an error. Please try again.', 'card/index');
                } else {
                    if (cards.length === 0) {
                        res.notFound('There are no cards in the database', '404');
                    } else {
                        res.ok({cards: cards}, 'card/index');
                    }
                }
            });
        } else {
            Card.find({ set: setId }).exec(function(err, cards) {
                if (err) {
                    res.badRequest('There was an error. Please try again.', 'card/index');
                } else {
                    if (cards.length === 0) {
                        res.notFound('Set does not exist', '404');
                    } else {
                        res.ok({cards: cards}, 'card/index');
                    }
                }
            });
        }
    },

    show: function (req, res) {

        var cardId = req.param('cardId');
        var setId = req.param('setId');

        // this needs to be simplified
        if(!setId) {
            Card.findOne({ id: cardId }).populate('set').exec(function(err, card) {
                if (err) {
                    res.badRequest('There was an error. Please try again.', 'card/show');
                } else {
                    if (!card) {
                        res.notFound('Card does not exist', '404');
                    } else {
                        res.ok({card: card}, 'card/show');
                    }
                }
            });
        } else {
            Card.findOne({ id: cardId, set: setId }).populate('set').exec(function(err, card) {
                if (err) {
                    res.badRequest('There was an error. Please try again.', 'card/show');
                } else {
                    if (!card) {
                        res.notFound('Card does not exist', '404');
                    } else {
                        res.ok({card: card}, 'card/show');
                    }
                }
            });
        }
    }
};

