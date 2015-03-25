var manipulate_element = function(element){
		this.element = element;
		this.sbm = 'margin' //Selected box model
		this.bs = 'solid' //Border Style
		this.bc = 'blue' //Border Color
		this.computedStyle = window.getComputedStyle(this.element);
		this.style = this.element.style;
		this.style.height = this.style.height || this.element.offsetHeight + 'px';
		this.style.width = this.style.width || this.element.offsetWidth + 'px';
		this.style.marginTop = this.style.marginTop || '0px';
		this.style.marginBottom = this.style.marginBottom || '0px';
		this.style.marginLeft = this.style.marginLeft || '0px';
		this.style.marginRight = this.style.marginRight || '0px';
		this.style.paddingTop = this.style.paddingTop || '0px';
		this.style.paddingBottom = this.style.paddingBottom || '0px';
		this.style.paddingLeft = this.style.paddingLeft || '0px';
		this.style.paddingRight = this.style.paddingRight || '0px';	
		this.style.borderTop = this.style.borderTop || '0px';
		this.style.borderBottom = this.style.borderBottom || '0px';
		this.style.borderLeft = this.style.borderLeft || '0px';
		this.style.borderRight = this.style.borderRight || '0px';
		this.style.fontSize = this.computedStyle.fontSize || '0px';		
	}
	manipulate_element.prototype.increaseMe = function(value){
		return (parseInt(value,10)+1)+'px'
	};
	manipulate_element.prototype.decreaseMe = function(value){
		return (parseInt(value,10)-1)+'px'
	};
	manipulate_element.prototype.increaseSize = function(position) {
		offset = this.sbm=='border'?0:1;
		if(position=='Top' || position=='Bottom'){
			if(parseInt(this.style.height,10)==0) return false;
			this.style.height = (parseInt(this.style.height,10)-offset)+'px';
		}
		else{
			if(parseInt(this.style.width,10)==0) return false;
			this.style.width = (parseInt(this.style.width,10)-offset)+'px';
		}
		this.style[this.sbm+position] = this.increaseMe(this.style[this.sbm+position]);
		this.style.setProperty('border-style',this.bs,'important');this.style.setProperty('border-color',this.bc,'important')
	};
	manipulate_element.prototype.decreaseSize = function(position) {
		offset = this.sbm=='border'?0:1;
		if(parseInt(value,10)==0) return false;
		if(position=='Top' || position=='Bottom')
			this.style.height = (parseInt(this.style.height,10)+offset)+'px';
		else
			this.style.width = (parseInt(this.style.width,10)+offset)+'px';
		this.style[this.sbm+position] = this.decreaseMe(this.style[this.sbm+position]);
		this.style.setProperty('border-style',this.bs,'important');this.style.setProperty('border-color',this.bc,'important')
	};
	manipulate_element.prototype.increaseFont = function(){
		this.style['fontSize'] = this.increaseMe(this.style['fontSize']);
	}
	manipulate_element.prototype.decreaseFont = function(){
		this.style['fontSize'] = this.decreaseMe(this.style['fontSize']);
	}