(function () {
    var Model = function (canvas) {
        var me = this;
        me.puppleArr = [];
        me.puppleNum = 100;
        me.canvas = canvas;
        me.context = canvas.getContext('2d');
        for (var i = 0; i < me.puppleNum; i++) {
            me.puppleArr.push(me.genPupple());
        }
        me.shake();
    }
    /**
     * 产生泡泡
     */
    Model.prototype.genPupple = function () {
        return {
            radius: (Math.random() * 10 | 0) || 1,
            v: Math.random() * 100,
            r: Math.random() * 256 | 0,
            g: Math.random() * 256 | 0,
            b: Math.random() * 256 | 0,
            a: Math.random(),
            angle: Math.PI * Math.random() * 2,
            x: this.canvas.width / 2,
            y: this.canvas.height / 2
        }
    }

    Model.prototype.shake = function () {
        var me = this;
        var ctx = me.context;
        foo();
        function foo() {
            ctx.clearRect(0, 0, me.canvas.width, me.canvas.height);
            for (var i = 0; i < me.puppleNum; i++) {
                var o = me.puppleArr[i];
                ctx.fillStyle = 'rgba(' + o.r + ',' + o.g + ',' + o.b + ',' + o.a + ')';
                ctx.beginPath();
                ctx.arc(o.x, o.y, o.radius, 0, 360, false);//x、y为圆心，半径，startangle,endangle,顺时针false
                ctx.fill();
                ctx.closePath();
                o.x += (o.v * 0.03) * Math.cos(o.angle);
                o.y += (o.v * 0.03) * Math.sin(o.angle);
                o.a += 0.01;
                if (o.a >= 1) {
                    me.puppleArr[i] = me.genPupple();
                }
            }
            setTimeout(foo, 30);//setTimeout() 方法用于在指定的毫秒数后调用函数或计算表达式。
        }
    }
    window.Pupple = Model;
}());
