import edit from './edit';
import save from './save';

import { metadata, name, settings } from './';

export default {
	name,
	settings: {
		...metadata,
		...settings,
		edit,
		save,
	},
};
