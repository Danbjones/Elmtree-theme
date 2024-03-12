module.exports = {
	mode: 'jit',
	purge: {
		mode: 'layers',
		layers: ['base', 'components', 'utilities'],
		content: ['**/*.php'],
		safelist: [
			'animate-fadeIn',
			'opacity-0',
			'prose-strong:text-white',
			'animate-fade-in-right',
			'animate-fade-in-left',
			'animate-move-up',
			'bg-red',
			'bg-black',
			'xl:border-black',
			'xl:border-red',
			'lg:flex-row-reverse',
			'text-white',
			'text-black',
			'text-red'
		  ]
	},
	theme: {
    extend: {
		animation: {
			'fadeIn': "fadeIn 1s ease-in forwards",
			'fade-in-right': 'fade-in-right 1s ease-in forwards',
			'fade-in-left': 'fade-in-left 1s ease-in forwards',
			'move-up': 'move-up 1s ease-in forwards',
		  },
		  keyframes: {
			fadeIn: {
			  "0%": { opacity: 0 },
			  "100%": { opacity: 1 }
			},
			'fade-in-right': {
				"0%": { 
					opacity: '0', 
					transform: 'translateX(-20px)'
				 },
				 "100%": { 
					opacity: '1', 
					transform: 'translateX(0)'
				 }
			},
			'fade-in-left': {
				"0%": { 
					opacity: '0', 
					transform: 'translateX(20px)'
				 },
				 "100%": { 
					opacity: '1', 
					transform: 'translateX(0)'
				 }
			},
			'move-up': {
				"0%": { 
					opacity: '1', 
					transform: 'translateY(20px)'
				 },
				 "100%": { 
					opacity: '1', 
					transform: 'translateY(0)'
				 }
			}
		  }
	},
	screens: {
		'xs': '500px',
		// => @media (min-width: 500px) { ... }
  
		'sm': '640px',
		// => @media (min-width: 640px) { ... }
  
		'md': '768px',
		// => @media (min-width: 768px) { ... }

		'mdbig': '886px',
		// => @media (min-width: 886px) { ... }
  
		'lg': '1024px',
		// => @media (min-width: 1024px) { ... }
  
		'xl': '1280px',
		// => @media (min-width: 1280px) { ... }
  
		'2xl': '1536px',
		// => @media (min-width: 1536px) { ... }
	  },
    colors: {
			transparent: 'transparent',
			current: 'currentColor',
			black: {
				DEFAULT: '#000000',
			},
			white: {
				DEFAULT: '#ffffff',
			},
			red: {
				DEFAULT: '#FA141B',
			},
			grey: {
				DEFAULT: '#2e2e2d',
			},
			lightgrey: {
				DEFAULT: '#1d1d1d'
			}
		},
  },
	variants: {},
	plugins: [
		require('@tailwindcss/typography'), 
		require('tailwind-scrollbar-hide')
	],
};
