import React, { Component } from 'react'
import HubletoTable, { HubletoTableProps, HubletoTableState } from '@hubleto/react-ui/ext/HubletoTable';
import FormFavoriteIP from './FormFavoriteIP';

interface TableFavoriteIPsProps extends HubletoTableProps {
  // Uncomment and modify these lines if you want to create URL-based filtering for your model
  // idCustomer?: number,
}

interface TableFavoriteIPsState extends HubletoTableState {
}

export default class TableFavoriteIPs extends HubletoTable<TableFavoriteIPsProps, TableFavoriteIPsState> {
  static defaultProps = {
    ...HubletoTable.defaultProps,
    formUseModalSimple: true,
    model: 'Hubleto/App/Custom/IpInfoTest/Models/FavoriteIP',
  }

  props: TableFavoriteIPsProps;
  state: TableFavoriteIPsState;

  translationContext: string = 'Hubleto\\App\\Custom\\IpInfoTest';
  translationContextInner: string = 'Components\\TableFavoriteIPs';

  constructor(props: TableFavoriteIPsProps) {
    super(props);
    this.state = this.getStateFromProps(props);
  }

  getStateFromProps(props: TableFavoriteIPsProps) {
    return {
      ...super.getStateFromProps(props),
    }
  }

  getFormModalProps(): any {
    let params = super.getFormModalProps();
    params.type = 'right wide';
    return params;
  }

  getEndpointParams(): any {
    return {
      ...super.getEndpointParams(),
      // Uncomment and modify these lines if you want to create URL-based filtering for your model
      // idCustomer: this.props.idCustomer,
    }
  }

  rowClassName(rowData: any): string {
    return '';
  }

  setRecordFormUrl(id: number) {
    window.history.pushState(
      {},
      "",
      globalThis.main.config.projectUrl + '/favorite-i-ps//' + (id > 0 ? id : 'add')
    );
  }

  renderForm(): JSX.Element {
    let formProps = this.getFormProps();
    // formProps.customEndpointParams.idCustomer = this.props.idCustomer;
    // if (!formProps.description) formProps.description = {};
    // formProps.description.defaultValues = { id_customer: this.props.idCustomer };
    return <FormFavoriteIP {...formProps}/>;
  }
}