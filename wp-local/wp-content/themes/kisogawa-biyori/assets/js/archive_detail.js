/**
 * @fileOverview
 */

 (function($) {

  "use strict";

  /**
   * クラス
   */
  var kisogawaBiyori = function() {
    this.initialize.apply(this, arguments);
  };

  /**
   * 初期化
   */
  kisogawaBiyori.prototype.initialize = function() {

    return this;
  };

  /**
   * 実行
   */
  kisogawaBiyori.prototype.run = function() {

    this.setEvents();

    return this;
  };

  /**
   * イベントセット
   */
  kisogawaBiyori.prototype.setEvents = function() {

    $('[data-fancybox="gallery"]').fancybox({
      loop: true,
      buttons: [ 
        "zoom",
        "share",
        "slideShow",
        "fullScreen",
        "download",
        "thumbs",
        "close"
      ],
      thumbs: {
        autoStart : false
      }
    });

    return this;

  };

  /**
   * 処理実行
   */
  $(function() {
    new kisogawaBiyori().run();
  });

  window.kisogawaBiyori = kisogawaBiyori;

}(window.jQuery));
