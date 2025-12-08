import React, { Component } from 'react'
import HubletoForm, { HubletoFormProps, HubletoFormState } from '@hubleto/react-ui/ext/HubletoForm';
import Table, { TableProps, TableState } from '@hubleto/react-ui/core/Table';

interface FormFavoriteIPProps extends HubletoFormProps { }
interface FormFavoriteIPState extends HubletoFormState { }

export default class FormFavoriteIP<P, S> extends HubletoForm<FormFavoriteIPProps, FormFavoriteIPState> {
  static defaultProps: any = {
    ...HubletoForm.defaultProps,
    model: 'Hubleto/App/Custom/IpInfoTest/Models/FavoriteIP'
  }

  props: FormFavoriteIPProps;
  state: FormFavoriteIPState;

  translationContext: string = 'Hubleto\\App\\Custom\\IpInfoTest';
  translationContextInner: string = 'Components\\FormFavoriteIP';

  constructor(props: FormFavoriteIPProps) {
    super(props);
  }

  getStateFromProps(props: FormDealProps) {
    return {
      ...super.getStateFromProps(props),
      tabs: [
        { uid: 'default', title: <b>this.translate('FavoriteIP')</b> },
        // Add your tabs here.
        // 'tab_with_nested_table': { title: 'Example tab with nested table' }
      ]
    };
  }

  getRecordFormUrl(): string {
    return 'favorite-i-ps/' + (this.state.record.id > 0 ? this.state.record.id : 'add');
  }

  renderTitle(): JSX.Element {
    return <>
      <small>FavoriteIP</small>
      <h2>Record #{this.state.record.id ?? '0'}</h2>
    </>;
  }

}
