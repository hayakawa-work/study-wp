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

    //slick
    $('.jsc-slider').slick({
      fade: true,    // fedeオン
      speed: 500,   // 画像切り替えにかかる時間（ミリ秒）
      autoplaySpeed: 2000,   // 自動スライド切り替え速度
      arrows: true,         // 矢印表示・非表示
      autoplay: true,        // 自動再生
      slidesToShow: 1,       // スライド表示数
      slidesToScroll: 1,     // スライドする数
      infinite: true,         // 無限リピート オン・オフ
      dots: true      // インジケーター表示・非表示
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
