// this is the shittiest code i've ever written idk if will even work
const cardTemplate = document.createElement('template');
cardTemplate.innerHTML = `
    <style>
        .card {
            display: flex;
            border-radius: 1.25rem;
            border: 0.5px solid #E5E5E5;
            background: #FFF;
        }
        .photo {
           cover no-repeat;
        }
        .author {
            color: #999;
            font-size: 1rem;
            font-weight: 400;
            line-height: normal;
        }
        .title {
            color: #000;
        }
        .info {
            display: flex;
            flex-direction: row;
            color: #555;
        }

    </style>
    <div class="card">
        <div class="photo" src=<slot name="photoUrl"></slot> alt="Photo"></div>
        <div class="author"><slot name="author"></slot></div>
        <div class="title"><slot name="title"></slot></div>
        <div class="info">
            <slot name="distance"></slot>
             • 
            <slot name="time"></slot> min
        </div>
        <<slot name="difficulty"></slot>></<slot name="level"></slot>>
    </div>
`;


class Card extends HTMLElement {
    constructor() {
        super();

        const shadowRoot = this.attachShadow({ mode: 'open' });

        const card = cardTemplate.content.cloneNode(true);
        shadowRoot.appendChild(card);
    }
}

customElements.define('card', Card);
