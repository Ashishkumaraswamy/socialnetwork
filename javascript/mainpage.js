const imageSection = document.querySelector(".instapost__image");
const likeHeart = document.querySelector(".like-heart");
const likeBtn = document.querySelector(".btn-like");
const commentInput = document.querySelector(".comment-input");
const commentSendBtn = document.querySelector(".btn-send-comment");
const ctrlLeft = document.querySelector(".ctrl-left");
const ctrlRight = document.querySelector(".ctrl-right");

commentInput.addEventListener("input", function (e) {
	if (e.target.value.length > 0) {
		commentSendBtn.setAttribute("disabled", "");
	} else {
		commentSendBtn.setAttribute("disabled", "disabled");
	}
});

likeBtn.addEventListener("click", function (e) {
	this.classList.toggle("dislike");
});

imageSection.addEventListener("dblclick", function (e) {
	likeHeart.classList.add("show");
	!likeBtn.classList.contains("dislike") && likeBtn.classList.add("dislike");
	setTimeout(() => likeHeart.classList.remove("show"), 1000);
});

let nextIndex = 1;
const imgList = imageSection.querySelectorAll('img');
function chageImage(direction) {
	return function (e) {
		e.preventDefault();
		
		console.log(nextIndex);
		
		imgList.forEach(item => item.classList.remove('show'));
		const img = imageSection.querySelector(`.img-${nextIndex}`);
		img.classList.add('show')
		
		if (nextIndex === 0) {
			ctrlLeft.classList.add("hide");
		} else {
			ctrlLeft.classList.remove("hide");
		}

		if (nextIndex === imgList.length - 1) {
			ctrlRight.classList.add("hide");
		} else {
			ctrlRight.classList.remove("hide");
		}

		if (direction === 0) {
			--nextIndex;
			if (nextIndex < 0) {
				nextIndex = 1;
			}
		} else if (direction === 1) {
			++nextIndex;
			if (nextIndex > imgList.length - 1) {
				nextIndex = imgList.length - 2;
			}
		}
	};
}

ctrlRight.addEventListener("click", chageImage(1));
ctrlLeft.addEventListener("click", chageImage(0));
